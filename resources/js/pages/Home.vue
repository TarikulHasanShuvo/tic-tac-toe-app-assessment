<template>
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-body">
                        <form @submit.prevent="saveGameInfo">
                            <div class="mb-3">
                                <label for="f-p-n" class="form-label">First Player Name</label>
                                <input v-model="gameInfo.first_player_name" type="text" class="form-control" id="f-p-n"
                                       required>
                            </div>
                            <div class="mb-3">
                                <label for="s-p-n" class="form-label">Second Player Name</label>
                                <input v-model="gameInfo.second_player_name" type="text" class="form-control" id="s-p-n"
                                       required>
                            </div>

                            <div class="mb-3">
                                <label for="b-l" class="form-label">Board Length</label>
                                <input v-model="gameInfo.board_length" type="number" class="form-control" max="10"
                                       min="2" id="b-l" required>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary ">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
import ApiService from "@/services/api.service";
import {v4 as uuidv4} from 'uuid';

export default {
    name: "Home",
    data() {
        return {
            gameInfo: {
                first_player_name: '',
                second_player_name: '',
                board_length: ''
            },
        }
    },
    methods: {
        saveGameInfo() {
            this.gameInfo.token = uuidv4();
            ApiService.post('game-info', this.gameInfo).then(({data}) => {
                localStorage.setItem('token', data.gameInfo.token);
                this.$router.push({name: "TicTacToe"});
            }).catch((error) => {
                console.log(error.response);
            })
        }
    }
}
</script>

<style scoped>

</style>
