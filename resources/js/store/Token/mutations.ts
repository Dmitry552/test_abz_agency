import type {TTokenState} from "@/store/Token/index";

const GET_TOKEN: string = 'GET_TOKEN';

export default {
    [GET_TOKEN]: (state: TTokenState, payload: string): void => {
        state.token = payload;
    }
}
