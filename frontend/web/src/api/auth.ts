import { request } from '@/utils/request';

export interface LoginParams {
  email: string;
  password: string;
}

export interface RegisterParams {
  name: string;
  email: string;
  password: string;
  password_confirmation: string;
}

export interface LoginResult {
  token: string;
  user: {
    id: number;
    name: string;
    email: string;
  };
}

export interface UserInfo {
  id: number;
  name: string;
  email: string;
  roles: string[];
}

/**
 * 用户登录
 */
export function login(data: LoginParams) {
  return request.post<LoginResult>({
    url: '/login',
    data,
  });
}

/**
 * 用户注册
 */
export function register(data: RegisterParams) {
  return request.post<LoginResult>({
    url: '/register',
    data,
  });
}

/**
 * 获取用户信息
 */
export function getUserInfo() {
  return request.get<UserInfo>({
    url: '/user',
  });
}

/**
 * 用户登出
 */
export function logout() {
  return request.post({
    url: '/logout',
  });
}
