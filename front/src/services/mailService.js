import axios from 'axios';

const mailService = {

    baseUri : process.env.VUE_APP_WORDPRESS_API_URL + '/ytic/v1',

    async sendMail(name, mail, content){
        const response = await axios.post(`${mailService.baseUri}/mail`,
        {
            name,
            mail,
            content
        }
        ).catch(function(error){
            console.log(error);
            return false;
        });
        return response.data;
    },

};

export default mailService;