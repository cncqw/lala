<template>
  <t-form
    ref="form"
    class="item-container"
    :class="[`register-${type}`]"
    :data="formData"
    :rules="FORM_RULES"
    label-width="0"
    @submit="onSubmit"
  >
    <t-form-item name="name">
      <t-input v-model="formData.name" size="large" :placeholder="t('pages.login.input.name')">
        <template #prefix-icon>
          <t-icon name="user" />
        </template>
      </t-input>
    </t-form-item>

    <t-form-item name="email">
      <t-input v-model="formData.email" type="text" size="large" :placeholder="t('pages.login.input.email')">
        <template #prefix-icon>
          <t-icon name="mail" />
        </template>
      </t-input>
    </t-form-item>

    <t-form-item name="password">
      <t-input
        v-model="formData.password"
        size="large"
        :type="showPsw ? 'text' : 'password'"
        clearable
        :placeholder="t('pages.login.input.password')"
      >
        <template #prefix-icon>
          <t-icon name="lock-on" />
        </template>
        <template #suffix-icon>
          <t-icon :name="showPsw ? 'browse' : 'browse-off'" @click="showPsw = !showPsw" />
        </template>
      </t-input>
    </t-form-item>

    <t-form-item name="password_confirmation">
      <t-input
        v-model="formData.password_confirmation"
        size="large"
        :type="showConfirmPsw ? 'text' : 'password'"
        clearable
        :placeholder="t('pages.login.input.confirmPassword')"
      >
        <template #prefix-icon>
          <t-icon name="lock-on" />
        </template>
        <template #suffix-icon>
          <t-icon :name="showConfirmPsw ? 'browse' : 'browse-off'" @click="showConfirmPsw = !showConfirmPsw" />
        </template>
      </t-input>
    </t-form-item>

    <t-form-item class="check-container" name="checked">
      <t-checkbox v-model="formData.checked">{{ t('pages.login.agree') }} </t-checkbox>
      <span>{{ t('pages.login.terms') }}</span> {{ t('pages.login.and') }}
      <span>{{ t('pages.login.privacy') }}</span>
    </t-form-item>

    <t-form-item>
      <t-button block size="large" type="submit" :loading="loading"> {{ t('pages.login.signUp') }} </t-button>
    </t-form-item>
  </t-form>
</template>
<script setup lang="ts">
import type { FormRule, SubmitContext } from 'tdesign-vue-next';
import { MessagePlugin } from 'tdesign-vue-next';
import { ref } from 'vue';

import { t } from '@/locales';
import { register } from '@/api/auth';

const emit = defineEmits(['register-success']);

const INITIAL_DATA = {
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
  checked: false,
};

const FORM_RULES: Record<string, FormRule[]> = {
  name: [{ required: true, message: t('pages.login.required.name'), type: 'error' }],
  email: [
    { required: true, message: t('pages.login.required.email'), type: 'error' },
    { email: true, message: t('pages.login.required.emailFormat'), type: 'warning' },
  ],
  password: [
    { required: true, message: t('pages.login.required.password'), type: 'error' },
    { min: 6, message: t('pages.login.required.passwordMin'), type: 'warning' },
  ],
  password_confirmation: [
    { required: true, message: t('pages.login.required.confirmPassword'), type: 'error' },
  ],
};

const form = ref();
const formData = ref({ ...INITIAL_DATA });
const showPsw = ref(false);
const showConfirmPsw = ref(false);
const loading = ref(false);

const onSubmit = async (ctx: SubmitContext) => {
  if (ctx.validateResult === true) {
    if (!formData.value.checked) {
      MessagePlugin.error(t('pages.login.agreeRequired'));
      return;
    }
    
    if (formData.value.password !== formData.value.password_confirmation) {
      MessagePlugin.error(t('pages.login.passwordMismatch'));
      return;
    }
    
    loading.value = true;
    try {
      await register({
        name: formData.value.name,
        email: formData.value.email,
        password: formData.value.password,
        password_confirmation: formData.value.password_confirmation,
      });
      
      MessagePlugin.success(t('pages.login.registerSuccess'));
      emit('register-success');
      form.value.reset();
    } catch (e: any) {
      console.log(e);
      MessagePlugin.error(e.message || t('pages.login.registerFailed'));
    } finally {
      loading.value = false;
    }
  }
};
</script>
<style lang="less" scoped>
@import '../index.less';
</style>
