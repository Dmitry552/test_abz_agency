import type {TTokenState} from "@/store/Token/index";

export const getToken = (state: TTokenState): string | null => state.token;
