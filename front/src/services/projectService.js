import axios from 'axios';

const projectService = {

    aremettre: process.env.VUE_APP_WORDPRESS_API_URL,
    baseUri : '    http://localhost:8080/Wordpress/ytic-project/back/public/wp-json' + '/wp/v2',

    async loadProjects(){
        console.log(projectService.baseUri);
        const response = await axios.get(`${projectService.baseUri}/project?_embeded&per_page=100`);
        
        return response.data;
    },

    async loadProject(slug){
        const response = await axios.get(`${projectService.baseUri}/project?_embed&slug=${slug}`);
        return response.data[0];
    }

};

export default projectService;