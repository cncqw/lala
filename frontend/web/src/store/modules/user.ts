import { defineStore } from 'pinia';

import { login as loginApi, logout as logoutApi, getUserInfo as getUserInfoApi } from '@/api/auth';
import { usePermissionStore } from '@/store';
import type { UserInfo } from '@/types/interface';

const InitUserInfo: UserInfo = {
  name: '', // 用户名，用于展示在页面右上角头像处
  roles: [], // 前端权限模型使用 如果使用请配置modules/permission-fe.ts使用
};

export const useUserStore = defineStore('user', {
  state: () => ({
    token: '', // JWT token
    userInfo: { ...InitUserInfo },
  }),
  getters: {
    roles: (state) => {
      return state.userInfo?.roles;
    },
  },
  actions: {
    /**
     * 用户登录
     */
    async login(userInfo: Record<string, unknown>) {
      try {
        const res = await loginApi({
          email: userInfo.account as string,
          password: userInfo.password as string,
        });
        
        this.token = res.token;
        this.userInfo = {
          name: res.user.name,
          roles: ['all'], // 默认赋予所有权限，可根据后端返回调整
        };
        
        return res;
      } catch (error: any) {
        throw new Error(error.message || '登录失败');
      }
    },
    
    /**
     * 获取用户信息
     */
    async getUserInfo() {
      if (!this.token) {
        throw new Error('未登录');
      }
      
      try {
        const res = await getUserInfoApi();
        this.userInfo = {
          name: res.name,
          roles: res.roles || ['all'],
        };
        return res;
      } catch (error: any) {
        // 如果获取用户信息失败，清除 token
        this.token = '';
        throw new Error(error.message || '获取用户信息失败');
      }
    },
    
    /**
     * 用户登出
     */
    async logout() {
      try {
        if (this.token) {
          await logoutApi();
        }
      } finally {
        this.token = '';
        this.userInfo = { ...InitUserInfo };
      }
    },
  },
  persist: {
    afterRestore: () => {
      const permissionStore = usePermissionStore();
      permissionStore.initRoutes();
    },
    key: 'user',
    paths: ['token'],
  },
});
