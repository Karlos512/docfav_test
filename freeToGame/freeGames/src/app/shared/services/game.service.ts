import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Game } from '@shared/interfaces/game.interface';
import { environment } from '@environment/environment';

@Injectable({
  providedIn: 'root',
})
export class GameService {
  constructor(private http: HttpClient) {}

  //    return this.http.get<Game[]>(`${environment.urlApi}games/?title=${query}`);
  getGames(query = '') {
    return this.http.get<Game[]>(`${environment.urlApi}games/?title=${query}`);
  }

  getDetails(id: number) {
    return this.http.get<Game>(`${environment.urlApi}game?id=${id}`);
  }
}
