
const { createApp } = Vue

createApp({
    data() {
        return {
            myApiUrl: 'server.php',
            tasksArray: [],
            taskItem: '',
            done: '',

        }
    },
    mounted() {
        // Richiamo del funzione che recupera l'array dall'api
        this.getTasksArray()
    },
    methods: {
        // Chiamata axios per recuperare i dati
        getTasksArray() {
            axios.get(this.myApiUrl).then((response) => {
                this.tasksArray = response.data;
            })
        },
        // Definisco la funzione aggiungie le task
        addTask() {
            const data = {
                item: this.taskItem,

            }
            axios.post(this.myApiUrl, data,
                {
                    headers: { 'Content-Type': 'multipart/form-data' }
                }).then((response) => {
                    this.taskItem = '';
                    this.tasksArray = response.data;

                })
        }
    },
}).mount('#app')
