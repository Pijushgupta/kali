<script setup>
import * as svgIcon from '@tabler/icons-vue';
import {computed} from 'vue';

const props = defineProps({
  iconName: String,
});

const resolveIcon = (iconName) => {
  if (svgIcon[iconName]) {
    return svgIcon[iconName];
  }
  console.log(`Icon "${iconName}" not found in icons.`);
  return null;
};

const resolvedIcon = computed(() => resolveIcon(props.iconName));

</script>

<template>
  <component :is="resolvedIcon"  stroke={2} />
</template>
