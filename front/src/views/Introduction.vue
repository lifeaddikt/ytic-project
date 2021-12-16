<template>
    <main class="introduction">
        <div class="introduction__shine first layer" data-speed="-3"></div>
        <div class="introduction__shine second layer" data-speed="1"></div>
        <div class="introduction__shine third layer" data-speed="3"></div>
        <div class="introduction__shine fourth layer" data-speed="-2"></div>
        <div class="introduction__shine fifth layer" data-speed="4"></div>
        <div class="introduction__shine sixth layer" data-speed="2"></div>

        <img draggable="false" class="introduction__cloud-1" src="../assets/images/nuage.png" alt="swaggy-cloud.jpeg">

        <div class="introduction__entry">
            <img draggable="false" class="introduction__title layer" data-speed="-1" src="../assets/images/new-title.png" alt="Sara Ytic">
            <router-link :to="{ name: 'Projets' }">
                <button class="introduction__button layer" data-speed="0.25" type="button"><span><i class="fas fa-caret-right"></i></span> Entrer <span><i class="fas fa-caret-left"></i></span></button>
            </router-link>
        </div>

        <img draggable="false" class="introduction__cloud-2" src="../assets/images/nuage.png" alt="swaggy-cloud.jpeg">
    </main>
</template>

<script>

export default {
    data(){
        return {
        }
    },
    mounted(){
        const introduction = document.querySelector('.introduction');
        introduction.addEventListener('mousemove', this.parallax);
    },
    methods: {
        parallax(e){
            const introduction = document.querySelector('.introduction');
            introduction.querySelectorAll('.layer').forEach(layer => {
                const speed = layer.getAttribute('data-speed');

                const x = (window.innerWidth - e.pageX * speed)/100;
                const y = (window.innerHeight - e.pageY * speed)/100;

                layer.style.transform = `translateX(${x}px) translateY(${y}px)`;
                
            })
        }
    }
}
</script>

<style scoped lang='scss'>
@use "../assets/scss/variable.scss";
@use "../assets/scss/animation.scss";

.introduction {
    width:100vw;
    overflow: hidden;
    position:relative;
    height:100vh;
    padding:0px;
    display: flex;
    align-items: center;

    &__shine {
        z-index:-1;
        position: absolute;
        border-radius: 50%;
        background-color: #f8f8f8;
        box-shadow: 0px 0px 5px #ffffb7;
        animation: star-anim 5s linear infinite;
        filter: blur(2px);
        @media (min-width:1024px){
            filter: blur(5px);
            }

        &.first {
            width:7.5px;
            height:7.5px;
            top:50%;
            left:40%;
            @media (min-width:1024px){
                width:30px;
                height:30px;
                top:33%;
            }
        }

        &.second {
            width:5px;
            height:5px;
            top:30%;
            left:30%;
            @media (min-width:1024px){
                top:35%;
                width:20px;
                height:20px;
            }
        }

        &.third {
            width:7.5px;
            height:7.5px;
            bottom:35%;
            right:25%;
            @media (min-width:1024px){
                width:35px;
                height:35px;
            }
        }

        &.fourth {
            width:8px;
            height:8px;
            bottom:30%;
            left:25%;
            @media (min-width:1024px){
                width:40px;
                height:40px;
            }
        
        }

        &.fifth {
            width:8px;
            height:8px;
            top:32.5%;
            right:25%;
            @media (min-width:1024px){
                width:25px;
                height:25px;
            }
        }

        &.sixth {
            width:10px;
            height:10px;
            bottom:45%;
            right:15%;
            @media (min-width:1024px){
                width:35px;
                height:35px;
            }
        }
    }

    &__title {
        width:85%;
        margin-bottom:variable.$small-gutter;
        z-index:1;
    }

    &__button {
        background-color: variable.$light-pink;
        border: variable.$normal-border;
        padding:variable.$small-gutter;
        box-shadow: variable.$tiny-shadow;
        font-size:18px;
        cursor: pointer;
        z-index: 10;

        &:hover{
             box-shadow: variable.$inner-shadow;
            }

        span {
            padding-right:.15rem;
            color: variable.$hard-pink;
            display:inline-block;
        }

        span:first-of-type {
            animation: left-arrow 1.5s ease-in-out infinite;
        }

        span:last-of-type {
            animation: right-arrow 1.5s ease-in-out infinite;
        }
    }

    &__cloud {
        z-index:-1;
        &-1 {
            position: absolute;
            top:0;
            animation: cloud 10s linear infinite;
            width:250px;
        }

        &-2 {
            position: absolute;
            bottom:0;
            animation: cloud2 8s linear infinite;
            width:250px;
        }
    }

}

@media (min-width:1024px){
    .introduction {
        justify-content: center;

        &__entry {
            display:flex;
            flex-direction: column;
            align-items: center;
        }

        &__title {
            max-width:1000px;
        }

            &__cloud {
                &-1 {
            position: absolute;
            top:0;
            left:-100px;
            animation: cloud 12s linear infinite;
            width:500px;
        }

            &-2 {
            position: absolute;
            bottom:0;
            animation: cloud2 9s linear infinite;
            z-index: -2;
            width:500px;

            @media (min-width:1500px){
                width:600px;
            }
        }
    }

    }

}

</style>