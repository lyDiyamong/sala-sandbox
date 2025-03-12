<template>
    <a-button type="primary" @click="handleClick">Profile</a-button>
    <div class="text-red-500">Hello World</div>
    <MyButton label="Click me" />
</template>

<script setup lang="ts">
import MyButton from "@/components/MyButton.vue";
import { useRouter } from "vue-router";



const handleClick = () => {
    window.location.href = "/profile";
};
</script>

