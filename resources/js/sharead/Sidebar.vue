<script setup lang="ts">
import { SidebarProvider, SidebarTrigger, SidebarInset } from "@/components/ui/sidebar";
import AppSidebar from "./AppSidebar.vue";
</script>

<template>
  <SidebarProvider>
    <AppSidebar />
    <SidebarInset>
    <main>
      <SidebarTrigger />
      <slot />
    </main>
  </SidebarInset>
  </SidebarProvider>
</template>