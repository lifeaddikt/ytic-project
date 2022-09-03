import axios from 'axios';

const projectService = {

    baseUri : process.env.VUE_APP_WORDPRESS_API_URL + '/wp/v2',

    async loadProjects(){
        const response = await axios.get(`${projectService.baseUri}/project?_embeded&per_page=100`);
        
        return response.data;
    },

    async loadProject(slug){
        const response = await axios.get(`${projectService.baseUri}/project?_embed&slug=${slug}`);
        return response.data[0];
    }

};

export default projectService;