<script setup lang="ts">
import Navbar from "../components/navbar.vue";
// This is a persistent layout
// Include me with <template layout="default" />
</script>

<template>
    <Navbar></Navbar>
	<slot />
</template>
