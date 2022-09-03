import axios from 'axios';

const collaborationService = {

    baseUri : process.env.VUE_APP_WORDPRESS_API_URL + '/wp/v2',

    async loadCollaborations(){
        const response = await axios.get(`${collaborationService.baseUri}/collaboration?_embeded&per_page=100`);
        
        return response.data;
    },

    async loadCollaboration(slug){
        const response = await axios.get(`${collaborationService.baseUri}/collaboration?_embed&slug=${slug}`);
        return response.data[0];
    }

};

export default collaborationService;