<template>
    <!-- {{ competition.teams }} -->
    <div class="grid grid-cols-3 gap-4 mt-3 mb-3 ml-2 mr-2">
        <div>
            <div class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <template v-if="team">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Información</h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">ID: {{ team.id }}</p>
                    <p class="font-normal text-gray-700 dark:text-gray-400">Nombre: {{ team.name }}</p>
                    <p class="font-normal text-gray-700 dark:text-gray-400">País: {{ team.country }}</p>
                </template>
            </div>
        </div>
        <table class="w-full col-span-2 text-sm text-left text-gray-500 dark:text-gray-400">
            <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                Jugadores
                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Lista de Equipos.</p>
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
                        Posición
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="player in team.players" :key="player.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ player.id }}
                    </th>
                    <td class="px-6 py-4">
                        {{ player.name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ player.position }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
import Layout from '../../layouts/default.vue'
import axios from 'axios'
import { Inertia } from '@inertiajs/inertia'

export default {
    layout: Layout,
    props: {
        team: {
            type: Object,
            required: true
        },
    },
    data() {
        //
    },
}
</script>
