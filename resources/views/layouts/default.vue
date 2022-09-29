<script>
import Navbar from "../components/navbar.vue";
import { VOffline } from 'v-offline';
// This is a persistent layout
// Include me with <template layout="default" />
export default {
  components: {
    VOffline,
    Navbar
  },
  data() {
    return {
      online: true,
    };
  },
  methods: {
    amIOnline(e) {
      this.online = e;
      console.log(this.online);
    },
  },
}
</script>

<template>
    <Navbar></Navbar>
    <v-offline @detected-condition="amIOnline">
        <template v-if="online">
            <!-- <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                <span class="font-medium">Success alert!</span> {{ online }}
            </div> -->
        </template>
        <template v-else>
            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                <span class="font-medium">¡Sin conexión a internet!</span> {{ online }}
            </div>
        </template>
      </v-offline>
	<slot />
</template>
