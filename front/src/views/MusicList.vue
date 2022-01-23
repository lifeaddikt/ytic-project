<template>

    <main>
        <Menu />
        <Loader v-if="isLoading" />
        <transition name="fade">
        <section class="music-list">
            <MusicElement @elementIsPlaying="updatePlaying" v-for="music in musicsList" :elementIsPlaying="elementIsPlaying" :key="music.id" :title="music.title.rendered" :artiste="music.acf.artiste" :production="music.acf.production" :date="music.acf.date" :src="music.acf.fichier_audio.url" :id="music.id" :imageSrc="music._embedded['wp:featuredmedia'][0].source_url" :type="music._embedded['wp:term'][0][0].name" />
        </section>
        </transition>
    </main>

    
</template>

<script>
import Menu from '../components/Menu.vue';
import MusicElement from '../components/MusicElement.vue';
import Loader from '../components/Loader.vue';

import musicService from '../services/musicService.js';

export default {

    components: {
        Menu,
        MusicElement,
        Loader
  },

  data(){
      return {
          musicsList: [],
          isLoading: true,
          elementIsPlaying: 0
      }
  },

  async created(){

      this.musicsList = await musicService.loadMusics();
      this.loaded();

  },

  methods: {
        loaded(){
            this.isLoading = false;
        },

        updatePlaying(){
            this.elementIsPlaying++;
        }
  }
    
}
</script>

<style scoped lang='scss'>
@use "../assets/scss/variable.scss";
@use "../assets/scss/animation.scss";

.music-list {
    margin:auto;
    display:grid;
    grid-template-columns: 1fr;
    grid-gap: variable.$big-gutter;
    justify-content: center;
    overflow-y: scroll;
    min-height:90vh;
    height:98vh;
    overflow-y:scroll;
    padding-bottom:50px;
    animation: componentAppear 1.5s linear forwards;
    &::-webkit-scrollbar {
    display: none;
}

    @media (min-width: 1025px){
        padding-bottom: 0;
        margin: 0 auto;
        width:100%;
        grid-template-columns: 1fr 1fr;
        justify-content: flex-end;
    }

    @media (min-width:1500px){
        width:80%;
        max-height:94vh;
    }
}

</style>