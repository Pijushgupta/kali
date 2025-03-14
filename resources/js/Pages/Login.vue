<script setup>
import { Button } from '@/components/ui/button'
import { Card, CardContent } from '@/components/ui/card'
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import { router, Link } from '@inertiajs/vue3'
import { reactive, watch } from 'vue'

const props = defineProps({
  errors: Object,
  flash: Object
});

const formData = reactive({
  loginEmail: null,
  loginPassword: null
});

const login = () => {
  router.post('/login', formData);
}

watch(()=>props.errors,(newVal)=>{
  console.log('hello');
},{deep:true});

</script>

<template>
  <div class="flex min-h-svh flex-col items-center justify-center bg-muted p-6 md:p-10">
    <div class="w-full max-w-sm md:max-w-3xl">
      <div class="flex flex-col gap-6">
        <Card class="overflow-hidden">
          <CardContent class="grid p-0 md:grid-cols-2">
            <form class="p-6 md:p-8" v-on:submit.prevent="login">
              <div class="flex flex-col gap-6">
                <div class="flex flex-col items-center text-center">
                  <h1 class="text-2xl font-bold">
                    Welcome back
                  </h1>
                  <p class="text-balance text-muted-foreground">
                    Login to your Acme Inc account
                  </p>
                </div>
                <div class="grid gap-2">
                  <Label for="email">Email</Label>
                  <Input id="email" type="email" placeholder="m@example.com" required v-model="formData.loginEmail" />
                </div>
                <div class="grid gap-2">
                  <div class="flex items-center">
                    <Label for="password">Password</Label>
                    <a href="#" class="ml-auto text-sm underline-offset-2 hover:underline">
                      Forgot your password?
                    </a>
                  </div>
                  <Input id="password" type="password" required v-model="formData.loginPassword" />
                </div>
                <Button type="submit" class="w-full">
                  Login
                </Button>
              </div>
            </form>
            <div class="relative hidden bg-muted md:block">
              <img
            src="../imgs/placeholder.svg"
            alt="Image"
            class="absolute inset-0 h-full w-full object-cover dark:brightness-[0.2] dark:grayscale"
          >
            </div>
          </CardContent>
        </Card>
        <div
          class="text-balance text-center text-xs text-muted-foreground [&_a]:underline [&_a]:underline-offset-4 hover:[&_a]:text-primary">
          By clicking continue, you agree to our <a href="#">Terms of Service</a>
          and <a href="#">Privacy Policy</a>.
        </div>
      </div>
    </div>
  </div>
</template>