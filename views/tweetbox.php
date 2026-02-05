<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/tweetbox.css">
    <title>Tweetbox</title>
</head>
<body>
    <h1>Tweetbox</h1>
    <div id="app">
        <form @submit.prevent="tweeter">
            <textarea v-model="text"></textarea>
            <p :class = "{limite: limiteAtteinte}">{{ nombreRestants }}</p>
            <!-- <p>{{ limiteAtteinte }}</p> -->
            <button :disabled = "limiteAtteinte">Tweet</button>
            <input id="photo" type="checkbox" v-model="photo">
            <label for="photo">{{ labelPhoto }}</label>
        </form>

        <table border="1">
            <tr>
                <th>Tweet</th>
                <th>Photo</th>
            </tr>
            <tr v-for="item in tweet">
                <td><strong>{{ item.text }}</strong></td>
                <!-- <td>{{ item.photo }}</td> -->
                <td v-if="item.photo"><img v-bind:src="item.photo"></td>
            </tr>
        </table>
        
<!-- {{tweet}} -->

        <!-- <ul>
            <li v-for="item in tweet">
            <strong>{{ item.text }}</strong>
            {{ item.photo }}
            </li>
        </ul> -->

    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="assets/tweetbox.js"></script>
</body>
</html>