import type {TUserState} from "@/store/User/index";

export const getUsers = (state: TUserState) => state.users;
export const getUser = (state: TUserState) => state.user;
