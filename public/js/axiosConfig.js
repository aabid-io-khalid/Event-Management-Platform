
import axios from 'axios'; 

const apiClient = axios.create({
    baseURL: '/',  
    headers: {
        'Content-Type': 'application/json'
    }
});

function getRequest(url) {
    return apiClient.get(url)
        .then(response => response.data)
        .catch(error => {
            console.error(`GET ${url} failed:`, error);
            return null;
        });
}

function postRequest(url, data) {
    return apiClient.post(url, data)
        .then(response => response.data)
        .catch(error => {
            console.error(`POST ${url} failed:`, error);
            return { success: false, error: 'Request failed' };
        });
}

export { getRequest, postRequest };
