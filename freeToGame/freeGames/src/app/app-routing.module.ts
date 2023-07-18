import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

const routes: Routes = [
  { path: '', redirectTo: 'home', pathMatch: 'full' },
  {
    path: 'home',
    loadChildren: () =>
      import('./components/pages/home/home.module').then((m) => m.HomeModule),
  },
  {
    path: 'game-list',
    loadChildren: () =>
      import('./components/pages/games/game-list/game-list.module').then(
        (m) => m.GameListModule
      ),
  },
  {
    path: 'game-details/:id',
    loadChildren: () =>
      import('./components/pages/games/game-details/game-details.module').then(
        (m) => m.GameDetailsModule
      ),
  },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule],
})
export class AppRoutingModule {}
