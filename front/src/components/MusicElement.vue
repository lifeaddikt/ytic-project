<template>

<article class="music-element">
    <div class="music-element__visual">
        <img class="music-element__visual__cover" :src="imageSrc" />
        <transition name="play">
        <img v-if="isPlaying" src="../assets/images/CD.png" class="music-element__visual__CD" />
        </transition>
    </div>

    <div class="music-element__description">
        <p v-html="title"></p>
        <p v-html="artiste"></p>
        <p v-html="production"></p>
        <p>{{type}}</p>
        <div class="music-element__audio-player">
            <audio :id="id" @timeupdate="timeSynchronisation" :src="src" preload=”metadata” loop />
            <button v-show="!isPlaying" @click="playMusic" class="music-element__audio-player-button"><i class="fas fa-play"></i></button>
            <button v-show="isPlaying" @click="playMusic" class="music-element__audio-player-button"><i class="fas fa-pause"></i></button>
            <span class="music-element__audio-currentTime">{{currentTime}}</span>
            <input class="music-element__audio-timeline" type="range" :max="maxDuration" value="0" @change="changeTime">
            <span class="music-element__audio-duration">{{audioDuration}}</span>
        </div>
    </div>
</article>
    
</template>

<script>
export default {

    mounted(){

        this.loadAudioContent();
    },

    data(){
        return {
            isPlaying:false,
            audioDuration: "0:00",
            maxDuration: 100,
            currentTime: "0:00",
            playState: "play",
        }
    },

    props: {
        // recipe: Object,
        title: String,
        artiste: String,
        production: String,
        type:String,
        src: String,
        imageSrc: String,
        id:Number,
    },

    methods: {
        playMusic(event){
            this.isPlaying = !this.isPlaying;
            const audio = event.currentTarget.closest('.music-element__audio-player').querySelector('audio');

              if(this.playState === 'play') {
                audio.play();
                this.playState = 'pause';
            } else {
                audio.pause();
                this.playState = 'play';
            }
        },

        timeSynchronisation(event){
            const audio = event.currentTarget.closest('.music-element__audio-player').querySelector('audio');
            const timeLine = event.currentTarget.closest('.music-element__audio-player').querySelector('.music-element__audio-timeline');
            timeLine.value = Math.floor(audio.currentTime);
            this.currentTime = this.calculateTime(timeLine.value);
        },

        changeTime(event){
            const audio = event.currentTarget.closest('.music-element__audio-player').querySelector('audio');
            const timeLine = event.currentTarget.closest('.music-element__audio-timeline');
            audio.currentTime = timeLine.value;
        },

        loadAudioContent(){
            const audio = document.getElementById(this.id);

            audio.addEventListener('loadedmetadata', () => {
            this.audioDuration = this.calculateTime(audio.duration);
            this.maxDuration = Math.floor(audio.duration);
            });

            const timeLine = audio.closest('.music-element__audio-player').querySelector('.music-element__audio-timeline');

            timeLine.addEventListener('input', () => {
            this.currentTime = this.calculateTime(timeLine.value);
            });
        },

        calculateTime(secs){
            const minutes = Math.floor(secs / 60);
            const seconds = Math.floor(secs % 60);
            const returnedSeconds = seconds < 10 ? `0${seconds}` : `${seconds}`;
            return `${minutes}:${returnedSeconds}`;
    }
    },

    computed: {

    }
    
}
</script>

<style lang="scss" scoped>
@use "../assets/scss/variable.scss";
@use "../assets/scss/animation.scss";

.music-element {
    display:flex;
    align-items:center;
    justify-content: center;

    @media (min-width:1024px){
        min-width:400px;
    }

    @media (min-width:768px){
        height:200px;
    }



    &__audio-player {
        display:flex;
        align-items:center;

        span {
            margin: 0 variable.$tiny-gutter;
            font-size:12px;
            width:20px;
        }

        &-button {
            cursor: pointer;
            background-color: transparent;
            border:none;

            @media (min-width:1024px){
            padding:variable.$small-gutter;
        }
        }
    }

    &__visual {
        position: relative;
        margin-right:variable.$gutter;

        &__CD {
            animation:turn 2s infinite linear;
            left:-52.5px;
            top:7px;
            position:absolute;
            z-index: -1;
            display:none;

            @media (min-width:768px){
                display:block;
                width:135px;
        }


        }
        &__cover {
            box-shadow: variable.$music-shadow;
            width:90px;

            @media (min-width:350px){
                width:100px;
            }
            @media (min-width:400px){
                width:110px;
            }

            @media (min-width:768px){
                    width:150px;
    }
        }
    }

    &__description {
        text-align: left;

        p {
            margin-bottom:variable.$small-gutter;
        }

        p:last-of-type {
            font-style: italic;
        }
    }

}

.play-enter-active {
    animation : moveLeft 1s linear forwards ;
}

.play-leave-active {
  animation: moveRight 1s linear forwards ;
}

input[type=range] {
    width:60%;
    min-width:130px;
    -webkit-appearance: none;
    appearance: none;
    height:2px;
    background: black;
    outline:none;
}

input[type=range]::-webkit-slider-thumb {
  -webkit-appearance: none; /* Override default look */
  appearance: none;
  width: 7.5px; /* Set a specific slider handle width */
  height: 7.5px; /* Slider handle height */
  border-radius:50%;
  background: black; /* Green background */
  cursor: pointer; /* Cursor on hover */
}


</style>