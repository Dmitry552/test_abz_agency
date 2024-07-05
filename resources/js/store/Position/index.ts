import * as getters from './getters';
import * as actions from './actions';
import type {Position} from "@/types";
import type {CustomModule} from "@/store/types";
import mutations from "@/store/Position/mutations";

export type TPositionState = {
    positions: Position[] | null
}

const state: TPositionState = {
    positions: null
}

const PositionModule: CustomModule<TPositionState> = {
    state,
    getters,
    actions,
    mutations
}

export default PositionModule;
