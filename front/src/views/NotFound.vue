<template>
    <main>
        <Menu />
        <error404 />
    </main>
    
</template>

<script>
import Menu from '../components/Menu.vue';
import error404 from '../components/error404.vue';

export default {

components: {
        Menu,
        error404,
  },
    
}
</script>

<style lang="scss" scoped>

</style>