import axios from 'axios';

const musicService = {

    baseUri : process.env.VUE_APP_WORDPRESS_API_URL + '/wp/v2',

    async loadProjects(){
        const response = await axios.get(`${projectService.baseUri}/music?per_page=100`);
        
        return response.data;
    },

};

export default musicService;