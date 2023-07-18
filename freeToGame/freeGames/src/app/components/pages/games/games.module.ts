import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';

// import {InfiniteScrollModule} from 'ngx-infinite-scroll';

import { GameListComponent } from '@games/game-list/game-list.component';
import { GameDetailsComponent } from '@games/game-details/game-details.component';
// import { CharacterComponent } from '@characters/character.componet';

@NgModule({
  declarations: [GameListComponent, GameDetailsComponent],
  imports: [CommonModule, RouterModule],
  exports: [GameListComponent, GameDetailsComponent],
})
export class GamesModule {}
