import axios from "axios";
import { Subject, Observable, from } from "rxjs";

export interface CadastroForm {
    id?: number;
    nome: string;
    email: string;
    cpf_cnpj: string;
    telefone: string;
    tipo: "cpf" | "cnpj";
}

export interface PagedData<T> {
    data: T[];
    total: number;
    per_page: number;
    current_page: number;
    last_page: number;
    from: number;
    to: number;
}

export class CadastroService {
    pagedUsers: PagedData<CadastroForm> = {
        data: [],
        total: 0,
        per_page: 0,
        current_page: 0,
        last_page: 0,
        from: 0,
        to: 0,
    };
    pagedUsersSubject = new Subject<PagedData<CadastroForm>>();
    currentPageSubject = new Subject<number>();

    currentPage = 1;

    async createCadastro(form: CadastroForm) {
        const response = await axios.post("api/cadastros", form);

        if (response.status === 201) {
            this.listCadastros();
        }

        return response.data;
    }

    async deleteCadastro(id: number) {
        const response = await axios.delete(`api/cadastros/${id}`);

        if (response.status === 200) {
            this.pagedUsers.data = this.pagedUsers.data.filter(
                (user) => user.id !== id
            );
            this.pagedUsersSubject.next(this.pagedUsers);
        }

        return response.data;
    }

    async updateCadastro(id: number, form: CadastroForm) {
        const response = await axios.put(`api/cadastros/${id}`, form);

        console.log(response.status);

        if (response.status === 200) {
            this.pagedUsers.data = this.pagedUsers.data.map((user) =>
                user.id === id ? response.data : user
            );
            this.pagedUsersSubject.next(this.pagedUsers);
        }

        return response.data;
    }

    listCadastros(): Observable<PagedData<CadastroForm>> {
        axios.get("api/cadastros?page=" + this.currentPage).then((response) => {
            console.log(response);
            if (!response.data) return;

            this.pagedUsers = response.data;
            this.pagedUsersSubject.next(response.data);
        });

        return this.pagedUsersSubject.asObservable();
    }

    listenPageChange(): Observable<number> {
        return this.currentPageSubject.asObservable();
    }

    setPage(page: number) {
        if (page >= 1 && page <= this.pagedUsers.last_page) {
            this.currentPage = page;
            console.log("Changed page to : ", this.currentPage);
            this.currentPageSubject.next(page);
            this.listCadastros();
        }
    }
}

export default new CadastroService();
