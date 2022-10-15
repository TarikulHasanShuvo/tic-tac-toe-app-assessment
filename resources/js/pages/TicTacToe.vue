<template>
    <div id="tic-tac-toe" class="mt-2">
        <h5>First Player : <span class="text-danger">{{ gameInfo?.first_player_name }}</span></h5>
        <h5>Second Player : <span class="text-success">{{ gameInfo?.second_player_name }}</span></h5>
        <main class="text-center">
            <h1 class="">Tic Tac Toe</h1>

            <h3 class="mb-4">Player
                <span v-if="player == 'X'" class="text-danger">{{ gameInfo?.first_player_name }}'s</span>
                <span v-else class="text-success">{{ gameInfo?.second_player_name }}'s</span>
                 turn</h3>

            <div class="d-flex justify-content-center mb-8">
                <div
                    v-for="(row, x) in board"
                    :key="x"
                    class="">
                    <div
                        role="button"
                        v-for="(cell, y) in row"
                        :key="y"
                        @click="makeMove(x, y)"
                        :class="`board-key ${cell == 'X' ? 'text-danger' : 'text-success'}`">
                        <h1 class="mt-2 fw-bold"> {{ cell }}</h1>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <h2 v-if="winner" class="fw-bold mt-4">Congratulation!
                    '{{ winner == 'X' ? gameInfo?.first_player_name : gameInfo?.second_player_name }}' have win the match!</h2>
                <h2 v-if="draw == board.flat().length" class="fw-bold mt-4">It is a Tie!</h2>
                <button @click="ResetGame"
                        class="btn btn-secondary mt-3">Reset
                </button>
            </div>
        </main>
    </div>

</template>

<script>

import ApiService from "@/services/api.service";

export default {
    name: 'TicTacToe',
    data() {
        return {
            gameInfo: {},
            player: 'X',
            board: [],
            winner: null,
            draw: 0
        }
    },
    mounted() {
        this.getGameInfo()
    },
    methods: {
        getGameInfo() {
            const token = localStorage.getItem('token');
            ApiService.get('/game-info?token=' + token)
                .then(response => {
                    this.gameInfo = response.data.gameInfo;
                    this.makeBoard(this.gameInfo.board_length)
                })
                .catch(error => {
                    console.log(error);
                });
        },
        makeMove(x, y) {
            if (this.winner) return

            if (this.board[x][y]) return

            this.board[x][y] = this.player
            this.checkingCondition();
            this.player = this.player === 'X' ? 'O' : 'X'
        },
        checkingCondition() {
            const payload = {
                board: this.board.flat(),
                board_length: this.gameInfo.board_length,
            }

            ApiService.post('/checking-winner', payload)
                .then(response => {
                    this.winner = response.data.winner
                    if (this.winner == null) this.draw++
                })
                .catch(error => {
                    console.log(error);
                });
        },
        ResetGame() {
            this.makeBoard(this.gameInfo.board_length)
            this.player = 'X'
            this.winner = null
            this.draw = 0
        },
        makeBoard(n=3) {
            this.board = Array(n).fill().map(() => Array(n).fill(''))
        }
    }
}
</script>


