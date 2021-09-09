<template>

    <main>
        <Menu />
        <transition name="fade">
        <section class="music-list">
            <MusicElement v-for="music in musicsList" :key="music.id" :title="music.title.rendered" :artiste="music.acf.artiste" :production="music.acf.production" :type="music._embedded['wp:term'].name" :date="music.acf.date" :src="music.acf.fichier_audio.url" :id="music.id" :imageSrc="music._embedded['wp:featuredmedia'][0].source_url" />
        </section>
        </transition>
    </main>

    
</template>

<script>
import Menu from '../components/Menu.vue';
import MusicElement from '../components/MusicElement.vue';
import musicService from '../services/musicService.js';
export default {

    components: {
        Menu,
        MusicElement,
  },

  data(){
      return {
          musicsList: [],
      }
  },

  async created(){

      this.musicsList = await musicService.loadMusics();

      console.log(this.musicsList);

  },
    
}
</script>

<style scoped lang='scss'>
@use "../assets/scss/variable.scss";
@use "../assets/scss/animation.scss";

.music-list {
    margin:auto;
    display:grid;
    grid-template-columns: 1fr;
    grid-gap: variable.$gutter;
    overflow-y: scroll;
    overflow-x:initial;
    width:100%;
    min-height:90vh;
    animation: componentAppear 1.5s linear forwards;

    @media (min-width: 1025px){
        margin: 0 auto;
        padding-left:2.5%;
    }

    @media (min-width: 768px){
        grid-template-columns: 1fr 1fr;
    }
}

</style>