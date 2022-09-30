<template>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">v>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                Jugadores de Fútbol
                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Lista de todos los jugadores de fútbol almacenados.</p>
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
                    <th scope="col" class="px-6 py-3">
                        Equipo
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="player in players" :key="player.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ player.id }}
                    </th>
                    <td class="px-6 py-4">
                        {{ player.name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ player.position }}
                    </td>
                    <td class="px-6 py-4">
                        {{ player.team.name }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
import Layout from '../../layouts/default.vue'

export default {
    layout: Layout,
    components: {
    },
    props: {
        players: {
            type: Object,
            required: true,
            default: null
        }
    }
}
</script>
