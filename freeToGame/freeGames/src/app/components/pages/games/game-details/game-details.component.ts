import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
// import {Location} from '@angular/common';
import { Observable } from 'rxjs';

// import { TrackHttpError } from '@shared/models/trackHttpError';
import { Game } from '@shared/interfaces/game.interface';
import { GameService } from '@shared/services/game.service';
import { take } from 'rxjs/operators';

@Component({
  selector: 'app-game-details',
  templateUrl: './game-details.component.html',
  styleUrls: ['./game-details.component.scss'],
})
export class GameDetailsComponent implements OnInit {
  game$: Observable<Game>;

  constructor(
    private route: ActivatedRoute,
    private gameService: GameService
  ) {}

  ngOnInit(): void {
    this.route.params.pipe(take(1)).subscribe((params) => {
      const id = params['id'];
      this.game$ = this.gameService.getDetails(id);
      console.log(this.game$);
    });
  }
}
