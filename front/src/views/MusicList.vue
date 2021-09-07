<template>

    <main>
        <Menu />
        <section>
            <MusicElement />
        </section>
    </main>
    
</template>

<script>
import Menu from '../components/Menu.vue';
import MusicElement from '../components/MusicElement.vue';
export default {

    components: {
        Menu,
        MusicElement,
  },
    
}
</script>

<style scoped lang='scss'>

</style>