<template>
  <div>
    <button class="bg-blue-500 text-white p-2 rounded">{{ props.label }}</button>
  </div>
</template>

<script lang="ts" setup>
const props = defineProps<{ label: string }>()
</script>

<style>

</style>