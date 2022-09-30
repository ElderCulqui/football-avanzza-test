<template>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">v>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                Equipos de Fútbol
                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Lista de todos los equipos de fútbol almacenados.</p>
            </caption>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        País
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Acciones</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="team in teams" :key="team.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ team.id }}
                    </th>
                    <td class="px-6 py-4">
                        {{ team.name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ team.country }}
                    </td>
                    <td class="px-6 py-4 text-right">
                        <Link :href="route('team.show', team.id)" class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ver</Link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script lang="ts">
import Layout from '../../layouts/default.vue'
import { Link } from '@inertiajs/inertia-vue3'

export default {
    layout: Layout,
    components: {
        Link
    },
    props: {
        teams: {
            type: Object,
            required: true,
            default: null
        }
    }
}
</script>
