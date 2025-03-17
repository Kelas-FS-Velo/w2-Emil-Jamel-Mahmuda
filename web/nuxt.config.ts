import tailwindcss from '@tailwindcss/vite';

// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  css: ['~/assets/css/main.css'],
  compatibilityDate: '2024-11-01',
  devtools: { enabled: true },
  modules: [
    '@nuxt/eslint',
    '@nuxt/ui',
    '@nuxt/icon',
    '@nuxt/scripts',
    '@nuxt/image',
    '@nuxt/fonts',
    '@nuxt/test-utils'
  ],
  vite: {
    plugins: [
      tailwindcss(),
    ],
  },
})