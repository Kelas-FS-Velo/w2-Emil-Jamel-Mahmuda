<script setup lang="ts">
interface Social {
  facebook: string;
  twitter: string;
  linkedin: string;
  github: string;
}

interface Profile {
  name: string;
  role: string;
  bio: string;
  avatar: string;
  social: Social,
}

const { data: profile, refresh, error, status } = useFetch<Profile>('http://127.0.0.1:8000/api/profile')

const pending = computed(() => status.value === 'pending')

const onRefreshHandler = () => {
  refresh()
}

const toast = useToast()

const onConnectHandler = () => {
  toast.add({
    title: 'Successfully',
    description: 'You are now connected with this profile',
    icon: 'i-lucide-check'
  })
}

useHead({
  title: 'Profile Page',
})
</script>

<template>
  <div class="flex flex-col justify-center items-center w-full min-h-screen h-full p-0 m-0 relative sm:before:block sm:before:h-6 sm:before:min-h-[24px] sm:before:flex-grow sm:after:block sm:after:h-6 sm:after:min-h-[24px] sm:after:flex-grow">
    <UCard 
      class="block w-full max-w-80 h-auto p-0 mx-auto rounded-xl shadow-md"
      variant="outline"
      :ui="{
        body: 'p-0 sm:p-0',
      }">
      <div class="flex flex-col justify-center items-center w-full h-auto p-4 m-0 text-center relative">
        <template v-if="pending">
          <USkeleton class="size-24 rounded-full p-0 m-0" />

          <USkeleton class="h-5 w-full p-0 my-2" />
          <USkeleton class="h-3 w-full p-0 m-0" />
          <USkeleton class="h-20 w-full p-0 my-6" />

          <div class="flex justify-center items-center gap-4 p-0 m-0 relative">
            <USkeleton class="size-7 rounded-full" />
            <USkeleton class="size-7 rounded-full" />
            <USkeleton class="size-7 rounded-full" />
            <USkeleton class="size-7 rounded-full" />
          </div>

          <USkeleton class="h-10 w-full p-0 mt-6" />
        </template>

        <template v-else-if="error">
          <h1 class="block p-0 my-2 font-medium text-center text-2xl relative">
            Oops!
          </h1>

          <p class="block w-full h-auto p-0 my-2 text-center text-sm relative">
            {{ error?.statusCode }} - {{ error?.message }}
          </p>

          <UButton 
            class="w-full justify-center mt-6" 
            color="error" 
            variant="solid" 
            size="xl"
            @click="onRefreshHandler"
          >
            Try Again
          </UButton>
        </template>

        <template v-else>
          <UAvatar 
            :src="profile?.avatar" 
            :alt="profile?.name" 
            :ui="{
              root: 'inline-flex items-center justify-center shrink-0 select-none overflow-hidden rounded-full align-middle bg-transparent size-24 text-2xl p-1 ring-2 ring-(--ui-primary)',
            }"
          />
          
          <h1 class="block p-0 my-2 font-medium text-center text-2xl relative">
            {{ profile?.name }}
          </h1>

          <span class="block p-0 m-0 text-center text-sm relative">
            {{ profile?.role }}
          </span>

          <p class="line-clamp-3 w-full h-auto p-0 my-6 text-center text-sm relative">
            {{ profile?.bio }}
          </p>

          <div class="flex justify-center items-center gap-4 p-0 m-0 relative">
            <UButton 
              class="rounded-full"
              icon="i-lucide-facebook" 
              size="sm" 
              color="neutral" 
              variant="soft" 
              :to="profile?.social.facebook"
              target="_blank"
            />
            <UButton 
              class="rounded-full"
              icon="i-lucide-twitter" 
              size="sm" 
              color="neutral" 
              variant="soft" 
              :to="profile?.social.twitter"
              target="_blank"
            />
            <UButton 
              class="rounded-full"
              icon="i-lucide-linkedin" 
              size="sm" 
              color="neutral" 
              variant="soft" 
              :to="profile?.social.linkedin"
              target="_blank"
            />
            <UButton 
              class="rounded-full"          
              icon="i-lucide-github" 
              size="sm" 
              color="neutral" 
              variant="soft" 
              :to="profile?.social.github"
              target="_blank"
            />
          </div>

          <UButton 
            class="w-full justify-center mt-6" 
            color="primary" 
            variant="solid" 
            size="xl"
            @click="onConnectHandler"
          >
            Connect
          </UButton>
        </template>
      </div>
    </UCard>
  </div>
</template>
