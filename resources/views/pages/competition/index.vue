<template>
    <p>Hola</p>
    {{ object }}
</template>
<script lang="ts">
import Layout from '../../layouts/default.vue'

export default {
    layout: Layout,
    props: {
        object: {
            type: Object,
            required: true,
            default: null
        }
    }
}
</script>
