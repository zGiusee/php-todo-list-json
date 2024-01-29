
const { createApp } = Vue

createApp({
    data() {
        return {
            myApiUrl: 'server.php',
            tasksArray: [],
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
                console.log(this.tasksArray);
            })
        },
        // Definisco la funzione di sbarramento delle task
        doneToggle(index) {
            this.tasksArray[index].done = !this.tasksArray[index].done
        }
    },
}).mount('#app')
