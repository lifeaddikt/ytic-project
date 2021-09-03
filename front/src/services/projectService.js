import axios from 'axios';

const projectService = {

    baseUri : process.env.VUE_APP_WORDPRESS_API_URL + '/wp/v2',

    async loadProjects(){
        const response = await axios.get(`${projectService.baseUri}/project?per_page=100`);
        
        return response.data;
    },

};

export default projectService;