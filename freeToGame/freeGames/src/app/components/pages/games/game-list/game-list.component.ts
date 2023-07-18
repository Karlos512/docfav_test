import { Component, OnInit } from '@angular/core';
import { filter, take } from 'rxjs/operators';
import { ActivatedRoute, ParamMap } from '@angular/router';
import { Game } from '@shared/interfaces/game.interface';
import { GameService } from '@shared/services/game.service';
import { Params } from '@angular/router';

@Component({
  selector: 'app-game-list',
  templateUrl: './game-list.component.html',
  styleUrls: ['./game-list.component.scss'],
})
export class GameListComponent implements OnInit {
  games: Game[] = [];

  private query: string;
  private hideScroll = 200;
  private showScroll = 500;

  constructor(
    private gameService: GameService,
    private route: ActivatedRoute
  ) {}

  ngOnInit(): void {
    this.getDataFromService();
  }

  private getGamesByQuery(): void {
    // this.route.queryParams.pipe(take(1)).subscribe((params: ParamMap) => {
    //   console.log(params);
    //   // this.query = params['q'];
    //   this.getDataFromService();
    // });
  }

  private getDataFromService(): void {
    this.gameService
      .getGames(this.query)
      .pipe(take(1))
      .subscribe((res: any) => {
        this.games = [...this.games, ...res];
      });
  }
}
