<script setup lang="ts">
import { Calendar, Home, Bot, Search, Settings } from "lucide-vue-next"
import { Link } from "@inertiajs/vue3"
import {
  Sidebar,
  SidebarContent,
  SidebarGroup,
  SidebarGroupContent,
  SidebarGroupLabel,
  SidebarMenu,
  SidebarMenuButton,
  SidebarMenuItem,
  SidebarMenuSubItem,
  SidebarMenuSub
} from "@/components/ui/sidebar"
import {
  Collapsible,
  CollapsibleContent,
  CollapsibleTrigger,
} from '@/components/ui/collapsible'

// Menu items.
const items = [
  {
    title: "Home",
    url: "#",
    icon: Home,
  },
  {
    title: "Inbox",
    url: "#",
    icon: Bot,
    items: [
      {
        title: 'Genesis',
        url: '#',
      },
      {
        title: 'Explorer',
        url: '#',
      },
      {
        title: 'Quantum',
        url: '#',
      },
    ],
  },
  {
    title: "Calendar",
    url: "#",
    icon: Calendar,
  },
  {
    title: "Search",
    url: "#",
    icon: Search,
  },
  {
    title: "Settings",
    url: "#",
    icon: Settings,
  },
];
</script>

<template>
  <Sidebar collapsible="icon">
    <SidebarContent>


      <SidebarMenu>

        <Collapsible defaultOpen classs="group/collapsible">

          <SidebarMenuItem v-for="item in items" :key="item.title">
            <template v-if="item.items">
              <CollapsibleTrigger asChild>
                <SidebarMenuButton asChild>
                  <Link :href="item.url">
                  <component :is="item.icon" />
                  <span>{{ item.title }}</span>
                  </Link>
                </SidebarMenuButton>
              </CollapsibleTrigger>
            </template>
            <template v-if="!item.items">

              <SidebarMenuButton asChild>
                <Link :href="item.url">
                <component :is="item.icon" />
                <span>{{ item.title }}</span>
                </Link>
              </SidebarMenuButton>

            </template>
            <CollapsibleContent>
              <SidebarMenuSub v-if="item.items">
                <SidebarMenuSubItem v-for="(subMenu, i) in item.items" :key="i">
                  <SidebarMenuButton asChild>
                    <a :href="subMenu.url"> <span>{{ subMenu.title }}</span> </a>
                  </SidebarMenuButton>
                </SidebarMenuSubItem>
              </SidebarMenuSub>
            </CollapsibleContent>
            

          </SidebarMenuItem>

        </Collapsible>

      </SidebarMenu>



    </SidebarContent>
  </Sidebar>
</template>