<template>
    <section class="project-list">
        <ul>
            <li v-for="(item, index) in projectsList" :key="item.project.id">
                ({{index + 1}}) {{item.project.title.rendered}}
                <img v-if="item.project.acf.first_picture" :src="item.project.acf.first_picture.url" :alt="altPicture(item.project)" :style="position.first[item.positionIndex]"/>
                <img v-if="item.project.acf.second_picture" :src="item.project.acf.second_picture.url" :alt="altPicture(item.project)" :style="position.second[item.positionIndex]"/>
            </li>
        </ul>
    </section>
    
</template>

<script>
import projectService from '../services/projectService.js';

export default {

    created(){

        this.loadProjects();
    },

    data(){
        return {
            projectsList: [],
            position:{
                first:['left:10%; top:20%;', 'top:5%; right:10%;', 'bottom:0; right:10%;'],
                second:['right:10%; bottom:20%;', 'left:10%; bottom:20%;', 'top:20%; left:10%;']
            },
        }
    },

    methods : {
        async loadProjects(){
            const list = await projectService.loadProjects();
            this.projectsList = list.reverse().map(item => ({ project : item, positionIndex : this.randomPositionIndex() }));
        },

        randomPositionIndex(){
            const min = 0;
            const max = 2;

            return Math.floor(Math.random() * (max - min + 1)) + min;
        },

        altPicture(project){

            return project.acf.first_picture.alt ? project.acf.first_picture.alt : project.title.rendered;

        },
    },

    computed : {

    },
    
}
</script>

<style scoped lang="scss">
@use "../assets/scss/variable.scss";
@use "../assets/scss/animation.scss";

.project-list {
    min-height:calc(100vh - 2rem);
    width:100%;
    overflow:hidden;
    text-align: left;
    font-size: 18px;
    font-weight: bold;
    padding-top:4rem;
    position:relative;

    img {
        z-index: -1;
        display:none;
        opacity: 0;
        max-width: 500px;
        max-height:400px;
        position:absolute;
    }

    @media (min-width:1024px){
        padding-top:0rem;
        font-weight: normal;
        font-size:40px;
        display: flex;
        align-items: flex-end;
    }
    

    ul {
        @media (min-width:1024px){
            display:inline;
    }
    }
    
    li {
        margin-bottom: variable.$small-gutter;
        @media (min-width:1024px){
            cursor: pointer;
            white-space: normal;
            word-wrap: break-all;
            display:inline;
            margin: variable.$tiny-gutter variable.$tiny-gutter 0 0;
            &:hover {
                color:variable.$light-pink;
            }
            &:hover img {
                display:block;
                animation: projectAppear 1.5s ease-in forwards;
            }
    }

    li:hover {
        color:red;
    }
    }
}

</style>