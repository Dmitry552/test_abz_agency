import type {TPositionState} from "@/store/Position/index";
import type {Position} from "@/types";

export const GET_POSITIONS: string = 'GET_POSITIONS';

export default {
    [GET_POSITIONS]: (state: TPositionState, payload: Position[]): void => {
        state.positions = payload;
    }
}
