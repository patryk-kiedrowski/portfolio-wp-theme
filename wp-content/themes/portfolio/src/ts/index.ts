require('../css/main.scss');

import { AdjustAdminBar } from './adjust-admin-bar';
import { BlogScrollIndicator } from './blog-scroll-indicator';
import { DarkModeSwitch } from './dark-mode-switch';
import { Navigation } from './navigation';

export const app = {
  adjustAdminBar: new AdjustAdminBar(),
  blogScrollIndicator: new BlogScrollIndicator(),
  darkModeSwitch: new DarkModeSwitch(),
  navigation: new Navigation(),
}