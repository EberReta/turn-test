<template>
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Buscar mayoristas" v-model="searchValue">
    </div>
</template>

<script>
import { eventBus } from '../EventBus';

export default {
    data() {
        return {
            searchValue: ''
        }
    },
    watch: {
        searchValue: function (val) {
            console.log("se envio", val);
            eventBus.$emit('searchMayorista', val);
        }
    },
}
</script>
