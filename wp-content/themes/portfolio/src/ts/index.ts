require('../css/main.scss');

import { AdjustAdminBar } from './adjust-admin-bar';
import { BlogScrollIndicator } from './blog-scroll-indicator';
import { DarkModeSwitch } from './dark-mode-switch';
import { Navigation } from './navigation';
import { HeroBackground } from './hero-background';

export const app = {
  adjustAdminBar: new AdjustAdminBar(),
  blogScrollIndicator: new BlogScrollIndicator(),
  darkModeSwitch: new DarkModeSwitch(),
  navigation: new Navigation(),
  heroBackground: new HeroBackground(),
}