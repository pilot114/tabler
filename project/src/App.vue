<template>
    <div id="app">
        <Page></Page>
    </div>
</template>

<script>
    import Page from './components/Page'

    export default {
        name: 'app',
        components: {
            Page
        }
    }
</script>

<style>
    * {
        padding: 0;
        margin: 0;
    }

    #app {
        font-family: 'Avenir', Helvetica, Arial, sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        margin-top: 5em;
    }
</style>
