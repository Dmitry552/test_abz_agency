import type {IErrorResponse, User} from "@/types";

export type TCreateUserData = {
    name: string,
    email: string,
    phone: string,
    position_id: number,
    photo: any
}

export type TGetUsersByPageData = {
    page: number,
    count: number,
    key: 'add' | 'rewrite'
}

export interface IGetUsers {
    "success": boolean,
    "page": number,
    "total_pages": number,
    "total_users": number,
    "count": number,
    "links": {
        "next_url": string | null,
        "prev_url": string | null
    },
    "users": User[]
}

export interface IPostCreateUsers {
    "success": boolean,
    "user_id": number,
    "message": string
}

export interface IGetUser {
    "success": boolean,
    "user": User[]
}

export interface IErrorValidateGetUser extends IErrorResponse{
    fails: {
        page?: string,
        count?: string
    }
}
