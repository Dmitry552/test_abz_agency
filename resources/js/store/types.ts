import type {Action} from "vuex";

export type TRootState = {};

export type TCustomAction<T> = Action<T, TRootState>
