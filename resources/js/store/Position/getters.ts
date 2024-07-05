import type {TPositionState} from "@/store/Position/index";
import type {Position} from "@/types";

export const getUserPositions = (state: TPositionState): Position[] | null => state.positions;
